import pyautogui as pg
import time

# while True:
#     print(pg.position())

if __name__ == "__main__":
    time.sleep(3)
    pg.scroll(1000000)
    inputPos = [1179, 650]
    pg.moveTo(inputPos[0], inputPos[1])
    pg.click()

    def split(word):
        return [char for char in word]

    text = "Ok Sir"
    print(text)
    txt = split(text)

    for i in range(len(txt)):
        pg.keyDown(txt[i])
        # print(txt[i])

    sendPos = [1274, 683]
    pg.moveTo(sendPos[0], sendPos[1])
    pg.click()
    screenPos = [569, 622]
    pg.moveTo(screenPos[0], screenPos[1])
    pg.click()
    exit()
