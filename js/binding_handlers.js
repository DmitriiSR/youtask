
ko.bindingHandlers.multiselect = {
    update: function(element, valueAccessor) {
        var value = valueAccessor();
        element.multiple = 'true';

        for (let i = 0; i < value.length; i++) {
            var optionElement = document.createElement("option");
            if (typeof value[i] !== 'object') {
                optionElement.value = value[i];
                optionElement.innerHTML = value[i];
            } else {
                optionElement.value = value[i].value;
                optionElement.innerHTML = value[i].key;
            }
            element.append(optionElement);
        }

        $(element).chosen()
    }
};
