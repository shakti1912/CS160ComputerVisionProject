# CS160ComputerVisionProject

CS 160 Class Project - Build a CV pipeline.

Needs a Users directory

## Overview

Calculate the location of your pupils and draw a face mesh on faces. This project determines of the above features on each still image from extracted from a video uploaded by the user on a video processing web-based application.

## Code Example

Extract and store metadata about the video in database
```php
$stmt = mysqli_prepare($con,'SELECT Name, Width, Height, v.VideoID FROM UserVideo u JOIN Video v ON u.VideoID = v.VideoID WHERE UserID = ?');
        mysqli_stmt_bind_param($stmt, "s", $UserID);
        mysqli_execute($stmt);
      mysqli_stmt_bind_result($stmt, $Name, $Width, $Height, $VideoID);
```

EyeLike
```c++
  for (int y = 0; y < weight.rows; ++y) {
    const double *Xr = gradientX.ptr<double>(y), *Yr = gradientY.ptr<double>(y);
    for (int x = 0; x < weight.cols; ++x) {
      double gX = Xr[x], gY = Yr[x];
      if (gX == 0.0 && gY == 0.0) {
        continue;
      }
      testPossibleCentersFormula(x, y, weight, gX, gY, outSum);
    }
  }
```

Delaunay triangles
```python
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
```

## Installation

Install OpenCV

Install Openface

Upload a video to the web-based user interface


