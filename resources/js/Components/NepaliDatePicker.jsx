import { useState, useEffect } from 'react';
import TextInput from './TextInput';
import InputLabel from './InputLabel';
import InputError from './InputError';

export default function NepaliDatePicker({
    label,
    value = '',
    onChange,
    error,
    required = false,
    disabled = false,
    className = '',
    ...props
}) {
    const [nepaliDate, setNepaliDate] = useState(value);
    const [isValid, setIsValid] = useState(true);

    // Nepali months
    const nepaliMonths = [
        'बैशाख', 'जेठ', 'आषाढ', 'श्रावण', 'भाद्र', 'आश्विन',
        'कार्तिक', 'मंसिर', 'पौष', 'माघ', 'फाल्गुन', 'चैत'
    ];

    const handleDateChange = (e) => {
        const value = e.target.value;
        setNepaliDate(value);
        
        // Basic validation for YYYY-MM-DD format
        const isValidFormat = /^\d{4}-\d{2}-\d{2}$/.test(value);
        setIsValid(isValidFormat);
        
        if (onChange) {
            onChange(e);
        }
    };

    return (
        <div className={className}>
            {label && (
                <InputLabel htmlFor={props.id} value={label} required={required} />
            )}
            
            <div className="relative">
                <TextInput
                    {...props}
                    type="text"
                    value={nepaliDate}
                    onChange={handleDateChange}
                    placeholder="वव-म-द (उदाहरण: 2081-04-15)"
                    disabled={disabled}
                    className={`${!isValid ? 'border-red-500' : ''}`}
                />
                
                <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg
                        className="w-4 h-4 text-gray-500 dark:text-gray-400"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
            </div>
            
            {!isValid && (
                <InputError message="कृपया मान्य मिति ढाँचा प्रयोग गर्नुहोस् (वव-म-द)" />
            )}
            
            {error && <InputError message={error} />}
            
            <p className="mt-1 text-xs text-gray-500 dark:text-gray-400">
                मिति ढाँचा: YYYY-MM-DD (जस्तै: 2081-04-15)
            </p>
        </div>
    );
}