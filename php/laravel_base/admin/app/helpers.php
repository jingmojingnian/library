<?php
/**
 * 根据类型获取状态
 * @param string $type 类型
 * @param string $value 状态值
 * @return string 状态
 */
function get_status($type, $value)
{
    switch ($type) {
        case 'role':
            $return = ['默认', -1 => '禁用', 1 => '启用'];
            break;
        default :
            $return = [];
    }
    
    return isset($return[$value]) ? $return[$value] : '-';
}