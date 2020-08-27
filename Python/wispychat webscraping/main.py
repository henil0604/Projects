#Python program to scrape website 
#and save quotes from website 
import requests 
from bs4 import BeautifulSoup 

URL = "http://wispychat.epizy.com/site/room/"
r = requests.get(URL) 

# soup = BeautifulSoup(r.content, 'html5lib') 

print(r.content)