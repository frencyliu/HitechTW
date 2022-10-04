<?php
function ht_icons_function($atts = array())
{
    extract(shortcode_atts(array(
        'type' => '',
        'class' => '',
    ), $atts));

switch ($type) {
    case 'fb':
        $img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAAA0CAYAAAAnpACSAAAACXBIWXMAABCcAAAQnAEmzTo0AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAANCSURBVHgB7VrbcdpAFF1sZmz/UYLyYfP4Cakg0AGpAFwBuAJIBXE6iCtwqAA6CP7h+ZF1B3zCMEDOUXY18gbCkjGblUdnRrNXV0Jzj7T3tUtGxBAEQe7q6qq+3W7LwnNkMpkB7OyOx2MZ6bRQLBabuHgvkocOCH2mEJIpFAptKvVVkBqA+Vz4jUpMDgllQITKHjWKxKf4p/MVsDuAvY+wV7tE9QyKpjqRSSFC0M7lclmNzaD2GVChZDpTEiClnG82mwfKDFr8MjmeMDqIBELbjTF3Jt4QUjK+4k2RyYr/BKN0CqiDzDD7DGf+sV6vn2az2VFByTkZkri8vGzC4JaOpBrQRfL5+TkTo4TYWSwWXYbhQ892SoZELi4uWG2UQSTUsepArpNKzvGIZfUAxzeQr2LsH3q+UzIwioVsaCgM/g7D7yaTiTTvU6VKDfd8EUfAWQCAgQ0Mdcow9OtoNNpbOlFPsuJIuIxmdTVKfI2WOAGcTDP6ilAlO7/Krns4tcRvwoG6rxwPCDZwQga+EnWuKAz75vWbm5sahse47lgihBMyjE46eu3KHYhmkaPvagyRc6waRSdkdD5RSfEFrq+vo6QJVOFPffGPcFrO7GrFkRxz4pWQ1maHoEqWuB/YRqY2olrdVCJodKfT6cG8cxIyIMKp09DnR0Smyi5lNpu1SqAnDwBGdJLmdUYq+E1/x++iGm21Wj0LC5ycDAy6Q3nS33ddheqqqc/n82Edxwho2wp4GwDwEt6r0bqn8ZlMOMXwZZ5sf+MiadbVqmmYNJEUX6xnq5qsEdfpvoYy/KknLOGCTEMLeNsSg7k4H+BoxxXx6Gfr/MQpyUgtcIHObJEP/YY4xvmJk5BRTdc7fY6p1BHG29+D279FvkNI1818RUrGV6RkfEVKxlekZHxFSsZXRGQsq1rvwIpcyyQjlfxRJBD6H1hsr0nmQZ3UdEeYFJRKJRLRez6DjNoo/ala1TlI3WP5p4t29dX+1YTntvBc/kdHCmMlBgt8ZSyc6x2AW2Gx3adQj+2LSj437E/JEMpeEv2Ga3I4qsPhMJxmggKIfBD2b8UX9Gk37efJH+umarUkEI6B6ZbDdLOe2thOH5jb6b8AeUR+NdMa9hQAAAAASUVORK5CYII=';
        $link = 'https://m.facebook.com/100348298858504/';
        break;
        case 'line':
            $img = 'data:image/png;base64,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';
            $link = 'https://liff.line.me/1645278921-kWRPP32q/?accountId=468tmnhy';
            break;
            case 'ig':
                $img = 'data:image/png;base64,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';
                $link = '';
                break;
    default:
    $img = '';
    $link = '';
        break;
}

    $html = '';
    ob_start();
?>
<a class="nolightbox icons_<?= $type ?>" href="<?= $link ?>" target="_blank" rel="noopener"><img src="<?= $img ?>" class="<?= $class ?>" width="34" height="34" alt="<?= $type ?>"></a>

<?php
    $html .= ob_get_clean();


    return $html;
}

add_shortcode('ht_icons', 'ht_icons_function');
