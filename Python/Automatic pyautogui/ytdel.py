import time
import pyautogui as pg
import keyboard
import pyttsx3

# Variables
deletedvideos = 0
engine = pyttsx3.init('sapi5')
voices = engine.getProperty("voices")
sec = 3;
xlocationofthreedots = 0
ylocationofthreedots = 0
xlocationofdeletebutton = 0 
ylocationofdeletebutton = 0

# Functions
def speak(audio, rate):
    voiceRate = rate
    engine.setProperty('rate', voiceRate)
    engine.say(audio)
    print(audio)

    engine.runAndWait()



def checksec(second):
    if(second == 3):
        speak("Location of Three Dots Are Founded", 130)
    elif(second == 2):
        speak("Location of Delete Button Are Founded", 130)




def delfun():
    if keyboard.is_pressed('q'):
        print("Exiting System")
        exit()

        
    xlocationofthreedots = 1326
    ylocationofthreedots = 181

    pg.moveTo(xlocationofthreedots, ylocationofthreedots)
    pg.click()

    
    xlocationofdeletebutton = 1300
    ylocationofdeletebutton = 353

    pg.moveTo(xlocationofdeletebutton, ylocationofdeletebutton)
    pg.click()

    print("{} Videos Deleted").format(deletedvideos)




def pos():
    while True:
        print(pg.position())



# For Innitial Declaration

speak("System Starting In, ", 130)
for i in range(sec):
    # print("System Is Starting in {} Seconds").format(sec)
    speak(sec, 100)
    checksec(sec)
    time.sleep(0.5)
    sec -= 1;

speak("System Started", 120)

# Starting a Loop And Calling delfun Function
speak("Press Q To Exit System", 130)
while True:
    time.sleep(0.5)
    delfun()
    deletedvideos += 1



# pos()
