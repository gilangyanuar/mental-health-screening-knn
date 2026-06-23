from flask import Flask, request, jsonify
import joblib
import numpy as np
import os
from pathlib import Path

app = Flask(__name__)

# Load model
BASE_DIR = Path(__file__).resolve().parent
model_path = os.getenv('KNN_MODEL_PATH', str(BASE_DIR / 'models' / 'model_knn.pkl'))
model = joblib.load(model_path)

@app.route('/', methods=['GET'])
def index():
    return 'Backend berhasil dijalankan!'

@app.route('/predict', methods=['POST'])
def predict():

    data = request.json

    # Hitung skor dari q1-q21
    skor_stres = (
        int(data['q1']) + int(data['q2']) + int(data['q3']) +
        int(data['q4']) + int(data['q5']) + int(data['q6']) +
        int(data['q7'])
    ) * 2

    skor_kecemasan = (
        int(data['q8'])  + int(data['q9'])  + int(data['q10']) +
        int(data['q11']) + int(data['q12']) + int(data['q13']) +
        int(data['q14'])
    ) * 2

    skor_depresi = (
        int(data['q15']) + int(data['q16']) + int(data['q17']) +
        int(data['q18']) + int(data['q19']) + int(data['q20']) +
        int(data['q21'])
    ) * 2

    # FIX: kirim 3 fitur sesuai yang dipakai saat training model
    fitur = np.array([[skor_stres, skor_kecemasan, skor_depresi]])

    hasil = model.predict(fitur)

    return jsonify({
        'prediksi': str(hasil[0])
    })

if __name__ == '__main__':
    port = int(os.getenv('PORT', '5001'))
    debug = os.getenv('FLASK_DEBUG', 'false').lower() == 'true'
    app.run(host='0.0.0.0', port=port, debug=debug)
