import string
import time
import datetime
from plyer import notification
import xlrd
import pandas as pd
import tkinter as tk
from tkinter import *
from tkinter.ttk import *
from time import strftime

global docNameVal
global prdVal


def onProductSelect(event):
    reslist = list()
    seleccion = productList.curselection()
    for i in seleccion:
        entrada = productList.get(i)
        reslist.append(entrada)
        for val in reslist:
            prdVal = val
            # print(prdVal)
            priceLableText = "    "+prdVal+"    "
            priceText = Label(root, text=priceLableText)
            priceText.config(font=("Courier", 10))
            priceText.grid(padx=20, pady=10, row=len(reslist)+3)

            global priceValue
            global priceInp
            priceValue = StringVar()
            priceInp = Entry(root, textvariable=priceValue, width=10)
            priceInp.config(font=("Courier", 10))
            priceInp.grid(row=len(reslist)+3, column=1)


def onProductDeselect(event):
    previous_selected = NONE
    if productList.curselection() == previous_selected:
        productList.selection_clear(0, END)
    previous_selected = productList.curselection()


def new():
    pass


def getData():
    docNameVal = doctorNameValue.get()
    prdList = list()
    seleccion = productList.curselection()
    print(docNameVal)

    for i in seleccion:
        entrada = productList.get(i)
        prdList.append(entrada)
        for val in prdList:
            prdVal = val
            print(prdVal)

    prcList = list()
    seleccion = priceInp.get()
    for i in seleccion:
        entrada = seleccion[i]
        prcList.append(entrada)
        for val in prcList:
            prcVal = val
            print(prcVal)

    return prdVal, prcVal


root = Tk()
root.geometry("1000x500")
root.title("Automatic Bill Generator")


menubar = Menu(root)
file = Menu(menubar, tearoff=0)
menubar.add_cascade(label='File', menu=file)
file.add_command(label='New Bill', command=new)
root.config(menu=menubar)

doctorText = Label(root, text="Dr Name:")
doctorText.config(font=("Courier", 14))
doctorText.grid(padx=20, pady=30, row=0)

doctorNameValue = StringVar()
doctorName = Entry(root, textvariable=doctorNameValue, width=30)
doctorName.config(font=("Courier", 12))
doctorName.grid(row=0, column=1)


productText = Label(root, text="Product:")
productText.config(font=("Courier", 14))
productText.grid(padx=20, pady=10, row=1)

options = ["PRICEPH 200", "OMIPOD 200", "ZM CV", "ITRAAZ 100", "ITRAAZ 200", "ZAN R 20", "ZAN RD", "AZAN PARA", "AZAN SP", "MITHICOB MD",
           "HISTAFINE M", "HISTAFINE", "D STAR GEL", "LULITHUS CREAM", "KERAMAX 30 TAB", "KERAMAX 15 TAB", "MITHICOB PN", "ROSIFINE TRIO"]
productValue = tk.StringVar()
productList = Listbox(root, selectmode="multiple", exportselection=0)
productList.bind('<<ListboxSelect>>', onProductSelect)
productList.bind('<FocusOut>', onProductDeselect)
productList.grid(row=1, column=1)
for each_item in range(len(options)):
    productList.insert(END, options[each_item])


printButton = Button(text="Print", command=getData)
printButton.grid(row=50)

root.mainloop()
