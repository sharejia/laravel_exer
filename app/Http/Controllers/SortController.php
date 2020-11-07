<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortController extends Controller
{
    /**
     * 冒泡排序
     */
    public function bubble()
    {
        # 由小到大排序

        # 定义待排序数据
        $data = [8, 5, 5, 8, 1, 3, 6, 95, 25, 252, 5552, 44526, 5522, 522, 336];

        # 定义交换元素位置的变量，临时存储使用
        $temp = null;

        # 实现
        # 1.外层循环控制头部元素，并且从第一个元素开始
        for ($i = 0; $i < count($data); $i++) {
            # 2.内层循环控制外层循环之后的每一个元素 （比如外层是8，那么内层就是5、5、8、1、3·····）
            for ($j = $i + 1; $j < count($data); $j++) {
                # 倘若$i控制的元素值大于$j控制的元素值，那么我们将两者交换位置
                if ($data[$i] > $data[$j]) {
                    $temp     = $data[$j];
                    $data[$j] = $data[$i];
                    $data[$i] = $temp;
                }
            }
        }

        return response($data);
    }

    /**
     * 快速排序
     */
    public function quick()
    {
        # 由小到大排序

        # 定义待排序数据
        $data = [8, 5, 5, 8, 1, 3, 6, 95, 25, 252, 5552, 44526, 5522, 522, 336];

        $result = $this->quick_do($data);

        return response($result);
    }

    /**
     * 快速排序执行
     */
    public function quick_do($data)
    {
        # 检查参数长度，如果只有一个元素，则直接返回，无须比较，否则会出现死循环
        if (count($data) <= 1) {
            return $data;
        }

        # 定义基准元素（以此元素为基准进行分治处理,model_element:标兵元素）
        $model_element = $data[0];

        # 定义容器数组
        $left_array = $right_array = [];

        # 将元素全部与标兵元素进行对比，小于标兵元素的放在left_array中;大于标兵元素的放在right_array中
        for ($i = 1; $i < count($data); $i++) {
            if ($data[$i] > $model_element) {
                $right_array[] = $data[$i];
            } else if ($data[$i] <= $model_element) {
                $left_array[] = $data[$i];
            }
        }

        # 递归处理分治好的元素,实际上是使用本逻辑继续处理分治好的元素,递归后一定会得到有序的内容
        $left_array  = $this->quick_do($left_array);
        $right_array = $this->quick_do($right_array);

        # 合并最后结果，把标兵元素放在中间位置
        return array_merge($left_array, [$model_element], $right_array);
    }


}
