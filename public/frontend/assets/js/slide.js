// document.addEventListener('DOMContentLoaded', function() {
//     // Get the hidden input
//     const minSalaryInput = document.getElementById('min_salary');

//     // Debug element
//     const debugValue = document.getElementById('debug-value');

//     // Toggle buttons
//     const salaryToggle = document.getElementById('salary-toggle');
//     const rateToggle = document.getElementById('rate-toggle');
//     const salarySlider = document.getElementById('salary-slider');
//     const rateSlider = document.getElementById('rate-slider');

//     // Convert hourly rate to annual salary (approximately)
//     function rateToSalary(rate) {
//       // Assuming 40 hours per week, 52 weeks per year
//       return Math.round(rate * 40 * 52);
//     }

//     salaryToggle.addEventListener('click', function() {
//       salaryToggle.classList.add('active');
//       rateToggle.classList.remove('active');
//       salarySlider.classList.remove('hidden');
//       rateSlider.classList.add('hidden');
//     });

//     rateToggle.addEventListener('click', function() {
//       rateToggle.classList.add('active');
//       salaryToggle.classList.remove('active');
//       rateSlider.classList.remove('hidden');
//       salarySlider.classList.add('hidden');
//     });

//     // Initialize salary slider
//     initializeSlider(
//       document.querySelector('#salary-slider .slider'),
//       document.querySelector('#salary-slider .slider-track'),
//       document.querySelector('#salary-slider .slider-thumb'),
//       document.querySelector('#salary-slider .salary-display'),
//       0,
//       200000,
//       3000,
//       value => {
//         // Update hidden input
//         minSalaryInput.value = value;

//         // Update debug panel
//         debugValue.textContent = value;

//         return '$' + value.toLocaleString();
//       }
//     );

//     // Initialize rate slider
//     initializeSlider(
//       document.querySelector('#rate-slider .slider'),
//       document.querySelector('#rate-slider .slider-track'),
//       document.querySelector('#rate-slider .slider-thumb'),
//       document.querySelector('#rate-slider .salary-display'),
//       15,
//       100,
//       45,
//       value => {
//         // Convert hourly rate to annual salary
//         const annualSalary = rateToSalary(value);

//         // Update hidden input
//         minSalaryInput.value = annualSalary;

//         // Update debug panel
//         debugValue.textContent = annualSalary + " (from $" + value + "/hr)";

//         return '$' + value + '/hr';
//       }
//     );

//     function initializeSlider(slider, sliderTrack, sliderThumb, display, min, max, initialValue, formatFunc) {
//       let isDragging = false;
//       let value = initialValue;

//       // Initialize slider position
//       updateSliderPosition();

//       // Handle mouse events
//       sliderThumb.addEventListener('mousedown', startDrag);
//       document.addEventListener('mousemove', drag);
//       document.addEventListener('mouseup', endDrag);

//       // Handle touch events for mobile
//       sliderThumb.addEventListener('touchstart', startDrag);
//       document.addEventListener('touchmove', drag);
//       document.addEventListener('touchend', endDrag);

//       // Handle clicks on the slider track
//       slider.addEventListener('click', clickTrack);

//       function startDrag(e) {
//         e.preventDefault();
//         isDragging = true;
//         sliderThumb.classList.add('active');
//       }

//       function endDrag() {
//         isDragging = false;
//         sliderThumb.classList.remove('active');
//       }

//       function drag(e) {
//         if (!isDragging) return;

//         let clientX;
//         if (e.type === 'touchmove') {
//           clientX = e.touches[0].clientX;
//         } else {
//           clientX = e.clientX;
//         }

//         const rect = slider.getBoundingClientRect();
//         const position = clientX - rect.left;

//         setValue(positionToValue(position, rect.width));
//       }

//       function clickTrack(e) {
//         const rect = slider.getBoundingClientRect();
//         const position = e.clientX - rect.left;

//         setValue(positionToValue(position, rect.width));
//       }

//       function positionToValue(position, width) {
//         let percentage = Math.max(0, Math.min(1, position / width));
//         let rawValue = min + percentage * (max - min);

//         // Step by 1000s for salary, by 1s for rate
//         const step = max > 1000 ? 1000 : 1;
//         return Math.round(rawValue / step) * step;
//       }

//       function setValue(newValue) {
//         value = Math.max(min, Math.min(max, newValue));
//         updateSliderPosition();
//         updateDisplayValue();
//       }

//       function updateSliderPosition() {
//         const percentage = (value - min) / (max - min) * 100;
//         sliderThumb.style.left = `${percentage}%`;
//         sliderTrack.style.width = `${percentage}%`;
//       }

//       function updateDisplayValue() {
//         display.textContent = formatFunc(value);
//       }
//     }
//   });

document.addEventListener('DOMContentLoaded', function() {
    // Get the hidden input
    const minSalaryInput = document.getElementById('min_salary');

    // Toggle buttons
    const salaryToggle = document.getElementById('salary-toggle');
    const rateToggle = document.getElementById('rate-toggle');
    const salarySlider = document.getElementById('salary-slider');
    const rateSlider = document.getElementById('rate-slider');

    // Convert hourly rate to annual salary (approximately)
    function rateToSalary(rate) {
        // Assuming 40 hours per week, 52 weeks per year
        return Math.round(rate * 40 * 4);
    }

    salaryToggle.addEventListener('click', function() {
        salaryToggle.classList.add('active');
        rateToggle.classList.remove('active');
        salarySlider.classList.remove('hidden');
        rateSlider.classList.add('hidden');
    });

    rateToggle.addEventListener('click', function() {
        rateToggle.classList.add('active');
        salaryToggle.classList.remove('active');
        rateSlider.classList.remove('hidden');
        salarySlider.classList.add('hidden');
    });

    // Initialize salary slider
    initializeSlider(
        document.querySelector('#salary-slider .slider'),
        document.querySelector('#salary-slider .slider-track'),
        document.querySelector('#salary-slider .slider-thumb'),
        document.querySelector('#salary-slider .salary-display'),
        0,
        200000,
        3000,
        value => {
            // Update hidden input
            minSalaryInput.value = value;

            // Return formatted value for display
            return '$' + value.toLocaleString();
        }
    );

    // Initialize rate slider
    initializeSlider(
        document.querySelector('#rate-slider .slider'),
        document.querySelector('#rate-slider .slider-track'),
        document.querySelector('#rate-slider .slider-thumb'),
        document.querySelector('#rate-slider .salary-display'),
        0,
        100,
        45,
        value => {
            // Convert hourly rate to annual salary
            const annualSalary = rateToSalary(value);

            // Update hidden input
            minSalaryInput.value = annualSalary;

            // Return formatted value for display
            return '$' + value + '/hr';
        }
    );

    function initializeSlider(slider, sliderTrack, sliderThumb, display, min, max, initialValue, formatFunc) {
        let isDragging = false;
        let value = initialValue;

        // Initialize slider position
        updateSliderPosition();

        // Handle mouse events
        sliderThumb.addEventListener('mousedown', startDrag);
        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', endDrag);

        // Handle touch events for mobile
        sliderThumb.addEventListener('touchstart', startDrag);
        document.addEventListener('touchmove', drag);
        document.addEventListener('touchend', endDrag);

        // Handle clicks on the slider track
        slider.addEventListener('click', clickTrack);

        function startDrag(e) {
            e.preventDefault();
            isDragging = true;
            sliderThumb.classList.add('active');
        }

        function endDrag() {
            isDragging = false;
            sliderThumb.classList.remove('active');
        }

        function drag(e) {
            if (!isDragging) return;

            let clientX;
            if (e.type === 'touchmove') {
                clientX = e.touches[0].clientX;
            } else {
                clientX = e.clientX;
            }

            const rect = slider.getBoundingClientRect();
            const position = clientX - rect.left;

            setValue(positionToValue(position, rect.width));
        }

        function clickTrack(e) {
            const rect = slider.getBoundingClientRect();
            const position = e.clientX - rect.left;

            setValue(positionToValue(position, rect.width));
        }

        function positionToValue(position, width) {
            let percentage = Math.max(0, Math.min(1, position / width));
            let rawValue = min + percentage * (max - min);

            // Step by 1000s for salary, by 1s for rate
            const step = max > 1000 ? 1000 : 1;
            return Math.round(rawValue / step) * step;
        }

        function setValue(newValue) {
            value = Math.max(min, Math.min(max, newValue));
            updateSliderPosition();
            updateDisplayValue();
        }

        function updateSliderPosition() {
            const percentage = (value - min) / (max - min) * 100;
            sliderThumb.style.left = `${percentage}%`;
            sliderTrack.style.width = `${percentage}%`;
        }

        function updateDisplayValue() {
            display.textContent = formatFunc(value);
        }
    }
});
