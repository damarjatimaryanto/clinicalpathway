<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <select class="form-control" id="selectOption">
        <option>-</option>
        <option id="cerebral-infarction">cerebral infarction (i63.9)</option>
        <option id="intracerebral-haemorrhage">intracerebral haemorrhage(I61.9)</option>
    </select>

    <th class="text-center">TOTAL BIAYA</th>
    <p id="totalSum"></p>

    <script>
        // Get the select element and the p element
        var selectOption = document.getElementById('selectOption');
        var totalSum = document.getElementById('totalSum');

        // Add an event listener to the select element
        selectOption.addEventListener('change', function() {
            // Get the selected option id
            var selectedOptionId = this.options[this.selectedIndex].id;
            var totalValue;

            // Check the selected option id and assign the corresponding value
            switch (selectedOptionId) {
                case 'cerebral-infarction':
                    totalValue = '5,000,000';
                    break;
                case 'intracerebral-haemorrhage':
                    totalValue = 'Another value';
                    break;
                default:
                    totalValue = '';
                    break;
            }

            // Update the p element with the calculated value
            totalSum.textContent = totalValue;
        });
    </script>

</body>

</html>