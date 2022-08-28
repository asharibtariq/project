function getTotalOfFields(total_class, total_id, total_value) {
    var total = 0;
    var val = total_value;
    $(total_class).each(function(){
        total+=(parseFloat(val) || 0);
    });
    $(total_id).val(total);
    return total;
}

