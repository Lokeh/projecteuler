#! /usr/bin/env python
# Problem 1: Find the sum of all the multiples of 3 or 5, between 1 and 1000.
#
# Formula: (Multiples of 3) + (Multiples of 5) - (Multiples of 15)
# Notice: Multiples of 15 are counted twice between the sets of 3 and 5,
# therefore we must correct by removing them once.

three = range(0, 1000, 3)
five = range(0, 1000, 5)
fifteen = range(0, 1000, 15)

s = 0

for x in five:
    s = s + x

for y in three:
    s = s + y

for z in fifteen:
    s = s - z

print s
