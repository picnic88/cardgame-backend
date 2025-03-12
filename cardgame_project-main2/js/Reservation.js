function goToScroll(name)
{
var location = document.querySelector("." + name).offsetTop;
window.scrollTo({top: location, behavior: 'smooth'});
}


$(document).ready(function() 
{
    $("#datepicker").datepicker(
        {
            dateFormat: "yy-mm-dd",
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            onSelect: function() 
            {
                calculate();
            },
        }
    );
});

function calculate() {
    
    let res = new Date($("#datepicker").val());
    let now = new Date(); 

    let nowFormatted = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')} 
                          ${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;

    $("#result").html(`<strong>현재 날짜:</strong> ${nowFormatted}<br><br>`);

    let m_now = now.getTime();
    let m_res = res.getTime();

    let r_sec = m_res - m_now;
    let r_day = Math.floor(r_sec / (1000 * 60 * 60 * 24)+1);

    let feeMessage = "";

    if (r_day === 0) {
        feeMessage = "이용일 당일이에요.<br> 수수료는 100%이에요.";
    } else if (r_day === 1) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 70%이에요.`;
    } else if (r_day === 2) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 50%이에요.`;
    } else if (r_day === 3) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 30%이에요.`;
    } else if (r_day === 4) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 20%이에요.`;
    } else if (r_day === 5) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 15%이에요.`;
    } else if (r_day === 6) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 10%이에요.`;
    } else if (r_day === 7) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 0%이에요.`;
    } else if (r_day > 7) {
        feeMessage = `이용일 ${r_day}일 전이에요.<br> 수수료는 0%이에요.`;
    } else if (r_day < 0) {
        feeMessage = "예약일이 이미 지났어요.";
    }

    $("#result").append(feeMessage);
}
