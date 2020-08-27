import datetime
import os
import sys
import time
import webbrowser
import keyboard
import pyttsx3
import speech_recognition as sr
import json
import pyautogui
from PIL import Image, ImageGrab
from difflib import get_close_matches 
import random
import subprocess
import clipboard
from func import *
# 
indexforscreenshot = 1;

def takeCommand(query):

    if query == "":
        usersaid = listener().lower()
        # usersaid = "search in youtube"
    else:
        usersaid = query

    string = ["hello", "who are you", "what is time", "open google", "open youtube", "install python package using pip", "open vs code", "shut down", "bye", "shutdown", "ok", "thank you", "thanks", "youtube live comment", "search in youtube", "take screenshot", "take a screenshot", "search in google", "send message in whatsapp"]

    # print(usersaid)
    
    if "hello" in usersaid:
        hello()
        checkKeys()

    elif "who are you" in usersaid:
        whoareyou()
        checkKeys()

    elif "what is time" in usersaid:
        whatistime()
        checkKeys()

    elif "open google" in usersaid:
        opengoogle()
        checkKeys()

    elif "open youtube" in usersaid:
        openyoutube()
        checkKeys()

    elif "install python package using pip" in usersaid:
        installpythonpackageusingpip()
        checkKeys()

    elif "open vs code" in usersaid:
        openvscode()
        checkKeys()

    elif "sleep" in usersaid or "bye" in usersaid or "shutdown" in usersaid:
        shutdown()
        main()
    
    elif "ok" in usersaid:
        ok()
        checkKeys()

    elif "thanks" in usersaid or "thank you" in usersaid:
        thanksorthankyou()
        checkKeys()

    elif "youtube live comment" in usersaid:
        youtubelivecomment()
        checkKeys()

    elif "search in youtube" in usersaid:
        searchinyoutube()
        checkKeys()

    elif "take screenshot" in usersaid or "take a screenshot" in usersaid:
        takescreenshot(indexforscreenshot)
        checkKeys()

    elif "search in google" in usersaid:
        searchingoogle()
        checkKeys()

    elif "send message in whatsapp" in usersaid:
        sendmessageinwhatsapp()
        checkKeys()

    else:
        clsmt = closeMatches(string, usersaid)
        if len(clsmt) != 0:
            takeCommand(clsmt[random.choice(clsmt)])

        else:
            print("You Said: " + usersaid)
            speak("I can't Understand Please Speak Again")
            checkKeys()


def checkKeys():
    while True:
        if keyboard.is_pressed('control') and keyboard.is_pressed('alt') and keyboard.is_pressed('d'):
            speak("Welcome Sir, Give Me Command")
            checkKeys()

def main():
    welcome()
    checkKeys()
    # getposition()

main()