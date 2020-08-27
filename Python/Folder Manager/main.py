import os


def createIfNotExist(folder):
    if not os.path.exists(folder):
        os.makedirs(folder)


def move(folderName, files):
    for file in files:
        # os.replace(file, '{}/{}'.format(folderName, file))
        os.replace(file, folderName+'/'+file)


files = os.listdir('C:\\Users\\admin\\Downloads')
print(files)

createIfNotExist('Images')
createIfNotExist('Docs')
createIfNotExist('Media')
createIfNotExist('Others')

imgExts = ['.png', '.jpg', '.jpeg']
images = [file for file in files if os.path.splitext(file)[
    1].lower() in imgExts]
print(images)

docExts = ['.txt', '.docs', '.doc', '.pdf']
docs = [file for file in files if os.path.splitext(file)[
    1].lower() in docExts]
print(docs)

mediaExt = ['.mp4', '.mp3', '.flv']
medias = [file for file in files if os.path.splitext(file)[
    1].lower() in mediaExt]
print(medias)

others = []
for file in files:
    ext = os.path.splitext(file)[1].lower()
    if (ext not in mediaExt) and (ext not in docExts) and (ext not in imgExts) and os.path.isfile(file):
        others.append(file)

print(others)

move('Images', images)
move('Docs', docs)
move('Media', medias)
move('Others', others)
