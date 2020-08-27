import speech_recognition as sr
import sys
import pyttsx3
import datetime
import wikipedia
import os
import speedtest
from googlesearch import search
import mysql.connector


engine = pyttsx3.init('sapi5')
voices = engine.getProperty("voices")
voiceRate = 165
engine.setProperty('rate', voiceRate)
# print(voices[0].id)
# engine.setProperty('voice', voices[0].id)


def speak(audio):
    engine.say(audio)
    print(audio)

    engine.runAndWait()


def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour >= 0 and hour < 12:
        speak("Good Morning, Sir!,")
    elif hour >= 12 and hour < 18:
        speak("Good Afternoon Sir!,")
    else:
        speak("Good Evening, Sir!")
    speak("I am Jarvis, How May i help you?")


def takeCommand():
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listning...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Recoginizing...")
        query = r.recognize_google(audio, language='en-in')
        file = open("History.txt", 'a')
        file.write(query)
        file.write("\n")
        file.write("\n")
        file.close()
        print("User Said: ")
        print(query)

    except Exception:
        # print(e)
        print("Please say Again,")
        return "None"

    return query


if __name__ == "__main__":
    wishMe()
    while True:
        query = takeCommand().lower()

        if "wikipedia" in query:
            speak("Searching Wikipedia for, ")
            speak(query)
            st = speedtest.Speedtest()
            stDown = st.download()
            # print(stDown)
            if stDown < 12000000:
                speak("Your Network Speed is slow It may Take a time")
            # print(st.download())
            query = query.replace("wikipedia", "")
            result = wikipedia.summary(query, sentences=3)
            speak("According To Wikipedia,")
            # print(result)
            speak(result)

        elif "open google" in query:
            speak("Opening Google,")
            webbrowser.open("google.com")

        elif "open youtube" in query:
            speak("Opening Youtube,")
            webbrowser.open("youtube.com")

        elif "open stackoverflow" in query:
            speak("Opening Stackoverflow,")
            webbrowser.open("stakeoverflow.com")
            speak(
                "Stackoverflow is a website where programmers discuss about Errors in program")

        elif "stop" in query:
            speak("Ok sir , i am going to sleep, bye,")
            sys.exit()

        elif "time" in query:
            strTime = datetime.datetime.now().strftime("%H:%M:%S")
            speak("The Time is :")
            speak(strTime)

        elif "open school channel" in query:
            speak("Opening Javiya schooling system In Youtube,")
            webbrowser.open_new_tab(
                "youtube.com/channel/UCDkQB1YVHE9SPsKkDDaPBMA")

        elif "hello" in query:
            speak("Hello Sir, How may i help you?")

        elif "jarvis" in query:
            speak("Yes what Sir, I am Here")

        elif "don't need help" in query:
            speak("ok sir, but i am always ready to help")

        elif "namaste" in query:
            speak(
                "Namaste Sir, in this situation of Corona Virus Spreading We all should be live as Indian")

        elif "who are you" in query:
            speak("I am Jarvis Made by Henil. I am artificial intelligence")

        elif "how are you" in query:
            speak("I am Fine sir, What about you?")

        elif "fine" in query:
            speak("ok, Always be happy!")

        elif "where are you from" in query:
            speak("I am everywhere, what about you?")
            country = takeCommand()
            country = country.replace("I am from", "")
            countryText = "Oh, You are from{}, Nice!".format(country)
            speak(countryText)

        elif "are you doing" in query:
            speak("Just  Lerning other Commands")

        elif "what" in query:
            speak("Searching Google for, ")
            speak(query)
            for j in search(query, num=3, stop=3, pause=2):
                print(j)
            speak("Here is some links I found on Google, You can Go there.")
