import { useState, useEffect } from 'react';
import TextInput from './TextInput';
import InputLabel from './InputLabel';
import InputError from './InputError';
import NepaliDatePicker from './NepaliDatePicker';
import DateFormatToggle from './DateFormatToggle';

export default function DualDateInput({
    label,
    adValue = '',
    nepaliValue = '',
    onAdChange,
    onNepaliChange,
    error,
    required = false,
    disabled = false,
    className = '',
    defaultFormat = 'ad',
    showToggle = true,
    ...props
}) {
    const [activeFormat, setActiveFormat] = useState(defaultFormat);

    const handleFormatChange = (format) => {
        setActiveFormat(format);
    };

    const handleAdDateChange = (e) => {
        if (onAdChange) {
            onAdChange(e);
        }
        
        // TODO: Auto-convert to Nepali date if needed
        // This would require calling the backend API or using a JS conversion library
    };

    const handleNepaliDateChange = (e) => {
        if (onNepaliChange) {
            onNepaliChange(e);
        }
        
        // TODO: Auto-convert to AD date if needed
    };

    return (
        <div className={className}>
            {label && (
                <div className="flex items-center justify-between mb-2">
                    <InputLabel value={label} required={required} />
                    {showToggle && (
                        <DateFormatToggle 
                            value={activeFormat} 
                            onChange={handleFormatChange}
                        />
                    )}
                </div>
            )}
            
            {activeFormat === 'ad' ? (
                <TextInput
                    {...props}
                    type="date"
                    value={adValue}
                    onChange={handleAdDateChange}
                    disabled={disabled}
                />
            ) : (
                <NepaliDatePicker
                    {...props}
                    value={nepaliValue}
                    onChange={handleNepaliDateChange}
                    disabled={disabled}
                />
            )}
            
            {error && <InputError message={error} />}
            
            {/* Show the other format value as helper text */}
            {activeFormat === 'ad' && nepaliValue && (
                <p className="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    नेपाली मिति: {nepaliValue}
                </p>
            )}
            
            {activeFormat === 'bs' && adValue && (
                <p className="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    English Date: {adValue}
                </p>
            )}
        </div>
    );
}