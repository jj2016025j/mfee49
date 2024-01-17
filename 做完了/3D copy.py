import numpy as np

# 定义立方体的顶点
vertices = np.array([
    [1, 1, 1],
    [1, -1, 1],
    [-1, -1, 1],
    [-1, 1, 1],
    [1, 1, -1],
    [1, -1, -1],
    [-1, -1, -1],
    [-1, 1, -1]
])

# 简单的透视投影
def perspective_projection(point, distance):
    x, y, z = point
    return x / (z + distance), y / (z + distance)

# 投影立方体的顶点到2D平面
distance = 2
projected_vertices = [perspective_projection(vertex, distance) for vertex in vertices]

# ASCII字符集
chars = "@%#*+=-:. "

# 将2D点转换为ASCII字符
def point_to_ascii(point):
    x, y = point
    return chars[int((x + 1) * len(chars) / 2) % len(chars)]

# 输出ASCII图像
for vertex in projected_vertices:
    print(point_to_ascii(vertex), end=' ')
