import pyttsx3
import PyPDF2

book = open('book.txt', 'r')
speaker = pyttsx3.init()
text = book.readlines()
print(text)
speaker.say(text)
speaker.runAndWait()
