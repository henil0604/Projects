import string
import random

if __name__ == "__main__":
    s1 = string.punctuation
    s2 = string.ascii_uppercase
    s3 = string.ascii_lowercase
    s4 = string.digits
    plen = int(input("Enter Password Length: "))
    s = []
    s.extend(list(s1))
    s.extend(list(s2))
    s.extend(list(s3))
    s.extend(list(s4))
    # print(s)
    random.shuffle(s)
    # print(s)
    print("".join(s[0:plen]))
