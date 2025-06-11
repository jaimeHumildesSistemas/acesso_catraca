import requests

url = "http://192.168.1.125/abreporta"

try:
    response = requests.get(url)
    if response.status_code == 200:
        print("Catraca liberada com sucesso!")
        print("Resposta do servidor:", response.text)
    else:
        print(f"Erro ao liberar catraca. Código HTTP: {response.status_code}")
except requests.RequestException as e:
    print("Erro na requisição:", e)
