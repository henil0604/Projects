import pyautogui as pg
import time

# while True:
#     print(pg.position())

if __name__ == "__main__":
    time.sleep(5)
    while True:
        optionPos = [1067, 556]
        deletePos = [1014, 514]
        delete2Pos = [1009, 619]
        deleteLastPos = [770, 381]
        pg.moveTo(optionPos[0], optionPos[1])
        pg.click()
        pg.moveTo(deletePos[0], deletePos[1])
        pg.click()
        pg.moveTo(delete2Pos[0], delete2Pos[1])
        pg.click()
        pg.moveTo(deleteLastPos[0], deleteLastPos[1])
        pg.click()
        time.sleep(1)
