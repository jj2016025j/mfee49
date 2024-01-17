import numpy as np

# 三维点 (x, y, z)
point_3d = np.array([1, 2, 3])

# 简单的透视投影
def perspective_projection(point, distance):
    x, y, z = point
    return x / (z + distance), y / (z + distance)

# 假设观察者与屏幕之间的距离为 2
distance = 2
point_2d = perspective_projection(point_3d, distance)

print(f"二维投影坐标: {point_2d}")
