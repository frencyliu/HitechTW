/*
只會 LV1 以上的用戶有作用
只作用在後台"頁面"編輯時
*/

(function(){

    //改名
    document.querySelector('#page_template option[value="page-templates/empty.php"]').text = 'LiveCanvas版型(請勿變更，後果自負)'

    //保留
    const keepTemplate = [
        //'page-templates/empty.php', //LiveCanvas版型
        'default',
        'page-template-slick.php',
        'page-template-simple.php',
        'page-template-portfolio.php',
        'page-template-container.php'
    ]

    //只留下保留的
    document.querySelectorAll('#page_template option').forEach(function(option){
        if(!keepTemplate.includes(option.value)){
            option.remove()
        }
    })

})()

