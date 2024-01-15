from flask import Flask, jsonify, request, render_template

app = Flask(__name__)

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/process_data', methods=['POST'])
def process_data():
    # 获取从JavaScript发送的数据
    data = request.json
    # 处理数据
    processed_data = data['value'] * 2  # 例如，简单地乘以2
    # 返回响应
    return jsonify({'result': processed_data})

if __name__ == '__main__':
    app.run(debug=True)
