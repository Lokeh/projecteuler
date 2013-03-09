#! /usr/bin/env python

n = 0
p = 0

for k in range(100,999):
    for l in range (100,999):
        n = str(k*l) # convert the product of k and l to a string so we can use slicing
        m = n[::-1] # un-documented function of slicing; n[::-1] reverses the string
        if (n == m and int(n)>p): # check if it's a palindrome and greater than the last p
            p = int(n)

print p
    
    
