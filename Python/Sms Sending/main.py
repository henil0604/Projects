import requests
import json
import time

i = 0
cycle = 5

print('1/5')
url = "https://www.fast2sms.com/dev/bulk"
print('2/5')
massage = "Ketlu Charging Chhe chhe?"
number = "9824198560"
payload = "sender_id=FSTSMS&message={}&language=english&route=p&numbers={}".format(
    massage, number)
print("3/5")
headers = {
    'authorization': "H8ORj0JAo2VktpBquLK5PfYCMwSzbNigmrands93WTZEUQ4elD43Aaf8QXVuwzpFCejKNh7o10ZrImbB",
    'Content-Type': "application/x-www-form-urlencoded",
    'Cache-Control': "no-cache",
}
print("4/5")
while i <= cycle:
    response = requests.request("POST", url, data=payload, headers=headers)
    res = response.text
    print(res)
    print("Done")
    i+=1
    time.sleep(1)

