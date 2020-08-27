import speech_recognition as sr
import pyttsx3
import pyautogui as pg
import os

engine = pyttsx3.init('sapi5')
voices = engine.getProperty("voices")
voiceRate = 165
engine.setProperty('rate', voiceRate)


def speak(audio):
    engine.say(audio)
    print(audio)

    engine.runAndWait()

def takeCommand():
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listning...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Recoginizing...")
        query = r.recognize_google(audio, language='en-in')

    except Exception:
        # print(e)
        print("Please say Again,")
        return ""

    return query


def split(word):
    return [char for char in word]


def sureyes(towrite):
    tw = split(towrite)
    speak("Sending Message Make Sure That Your Youtube is Opened")
    pg.moveTo(1271, 651)
    pg.click()
    for i in range(len(tw)):
        pg.keyDown(tw[i])
        pg.keyUp(tw[i])
    pg.moveTo(1268, 683)
    pg.click()

# while True:
#     print(pg.position())

speak("Speak What You Want to Write ")
towrite = takeCommand()
if(towrite != "None"):
    speak("Your Message is " + towrite)
    print("Your Message: " + towrite)
    speak("Are You Sure You Want to Send Message")
    speak("Listening For Your Surity")
    sure = takeCommand()
    if("yes" in sure):
        sureyes(towrite)

    if("no" in sure):
        speak("Ok Exiting Programme")
        os.system("python main.py")

elif(towrite == ""):
    speak("Please Run The Programme Again")




    
