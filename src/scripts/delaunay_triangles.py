#!/usr/bin/python

import re
import cv2
import numpy as np
import random
from sys import argv
import subprocess
# Check if a point is inside a rectangle
def rect_contains(rect, point) :
    if point[0] < rect[0] :
        return False
    elif point[1] < rect[1] :
        return False
    elif point[0] > rect[2] :
        return False
    elif point[1] > rect[3] :
        return False
    return True

# Draw a point
def draw_point(img, p, color ) :
    cv2.circle (img, p, 3, color, cv2.FILLED, cv2.LINE_AA, 0)


# Draw delaunay triangles
def draw_delaunay(img, subdiv, delaunay_color ) :

    triangleList = subdiv.getTriangleList();
    size = img.shape
    r = (0, 0, size[1], size[0])

    for t in triangleList :
        pt1 = (t[0], t[1])
        pt2 = (t[2], t[3])
        pt3 = (t[4], t[5])
        if rect_contains(r, pt1) and rect_contains(r, pt2) and rect_contains(r, pt3) :
            cv2.line(img, pt1, pt2, delaunay_color, 1, cv2.LINE_AA, 0)
            cv2.line(img, pt2, pt3, delaunay_color, 1, cv2.LINE_AA, 0)
            cv2.line(img, pt3, pt1, delaunay_color, 1, cv2.LINE_AA, 0)
def rets(filename):
    #script, filename = argv
    print filename
    file = open(filename, "r")

#var index
#print file.read()

#skip these lines
#print "1", file.readline()
#print "2", file.readline()
#print "3", file.readline()

#print "4", file.readline()
# find index of { and inden of }

    matches = []
    regex = re.compile(r"\d*\.\d+\s+\d*\.\d+")

    for line in file:
        pointsStr = regex.findall(line)

    #print type(pointsStr)
    #print pointsStr
        lst = []
        tup = ()
        if(len(pointsStr) != 0):
            lst = pointsStr[0].split(' ')
            x = int(float(lst[0]))
            y =  int(float(lst[1]))
            tup = (x,y)
            matches.append(tup)
    #print lst


    file.close()

    return matches

    #subprocess.call("./parserScript.py "+argv[1], shell=True)
 ########################################################################################################

if __name__ == '__main__':

    # Define window names
    win_delaunay = "Delaunay Triangulation"

    # Turn on animation while drawing triangles
    animate = True

    # Define colors for drawing.
    delaunay_color = (255,0,0)
    points_color = (0, 0, 255)

    # Read in the image.
    img = cv2.imread(argv[1]);

    # Keep a copy around
    img_orig = img.copy();

    # Rectangle to be used with Subdiv2D
    size = img.shape
    rect = (0, 0, size[1], size[0])

    # Create an instance of Subdiv2D
    subdiv = cv2.Subdiv2D(rect);

    # Create an array of points.
    #############################################################################
    points = [];

    points = rets(argv[2])
    del points[-1]
    print points

    # Insert points into subdiv
    for p in points :
        subdiv.insert(p)

    # Draw delaunay triangles
    draw_delaunay (img, subdiv, (255, 0, 0));

    # Draw points
    for p in points :
        draw_point(img, p, (0,0,255))

    cv2.imwrite(argv[3], img);
