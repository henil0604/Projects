import time
import pyautogui as pg

index = 1
stopindex = 500

# while True:
#     print(pg.position())

time.sleep(3)
while index <= stopindex:
    def split(word):
        return [char for char in word]

    pg.moveTo(1201, 672)
    # pg.moveTo(1043, 669)
    pg.click()
    spilitedwords = split(str(index))

    for i in range(len(spilitedwords)):
        pg.keyDown(spilitedwords[i])

    pg.moveTo(1302, 675)
    # pg.moveTo(1119, 667)
    pg.click()
    index += 1
