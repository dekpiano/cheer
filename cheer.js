(function() {
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            $('.first').attr('style', 'background-image: url(' + URL.createObjectURL(file) + ')');
        }
    }

    let color;
    let num;
    Array.from(document.querySelectorAll('.second td')).forEach(td => {
        td.onclick = function() {
            color = this.getAttribute('bgcolor');
            num = this.getAttribute('num');
        };
    });

    document.getElementById("clear").onclick = function() {
        Array.from(document.querySelectorAll('table.first td')).forEach(td => {
            td.removeAttribute('bgcolor');
        });
    };

    var isMouseDown = false,
        isHighlighted;
    $("table.first td")
        .mousedown(function() {
            isMouseDown = true;
            if (color) {
                $(this).attr('bgcolor', color);
                if (num == 1) {
                    $(this).addClass('text-blank');
                } else {
                    $(this).addClass('text-white');
                    $(this).removeClass('text-blank');
                }
                $(this).addClass('clickItem');
                //this.setAttribute('style', 'padding: 2px;text-align: center;');
                $(this).html(num);
                return false; // prevent text selection
            } else {
                alert("กรุณาเลือกสีก่อนนะจ๊ะ อยู่ด้านบนอ่ะ");
            }

        })
        .mouseover(function() {
            if (isMouseDown) {
                $(this).attr('bgcolor', color)
                if (num == 1) {
                    $(this).addClass('text-blank');
                } else {
                    $(this).addClass('text-white');
                    $(this).removeClass('text-blank');
                }
                $(this).addClass('clickItem');
                //this.setAttribute('style', 'padding: 2px;text-align: center;');
                //$(this).addClass("highlighted", isHighlighted);
                $(this).html(num);
            }
        });

    $(document)
        .mouseup(function() {
            isMouseDown = false;

        });



})();

$(document).ready(function() {

    $('#ShowBorderGroup').click(function() {
        var value = $(this).val();
        var checked = $(this).is(':checked');
        //alert(checked);
        if (checked) {
            $('.ShowBorderGroup').attr('style', "border-right:2px solid #f00;");
        }
    });


    $('#save').click(function() {

        $(".first tr.row_value ").each(function(row, tr) {
            var total = new Array();

            total.push($(this).attr('KeyRow'));
            $(this).find('td.body').each(function() {
                var value = $(this).text();
                if (value > 0) {
                    total.push(value);
                } else {
                    total.push(0);
                }
            });

            $.post("php/PhpAddCheer.php", {
                val: total,
                range_row: $('#range_row').val(),
                range_column: $('#range_column').val()
            }, function(data, status) {
                console.log(data);

                Swal.fire(
                    'แจ้งเตือน!',
                    'บันทึกข้อมูลแล้ว',
                    'success'
                )

            });
        });

    });

});

// แรงค์
const allRanges = document.querySelectorAll(".range-wrap");
allRanges.forEach(wrap => {
    const range = wrap.querySelector(".range");
    const bubble = wrap.querySelector(".bubble");

    range.addEventListener("input", () => {
        setBubble(range, bubble);
    });
    setBubble(range, bubble);
});

function setBubble(range, bubble) {
    const val = range.value;
    const min = range.min ? range.min : 0;
    const max = range.max ? range.max : 100;
    const newVal = Number(((val - min) * 100) / (max - min));
    bubble.innerHTML = val;

    // Sorta magic numbers based on size of the native UI thumb
    bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}

$(document).on('change', '#range_column', function() {
    var range_row = $('#range_row').val();
    var range_column = $('#range_column').val();
    window.location.href = '../cheer/systercheer.php?Col=' + range_column + '&Row=' + range_row + '';
});

$(document).on('change', '#range_row', function() {
    var range_row = $('#range_row').val();
    var range_column = $('#range_column').val();
    window.location.href = '../cheer/systercheer.php?Col=' + range_column + '&Row=' + range_row + '';
});