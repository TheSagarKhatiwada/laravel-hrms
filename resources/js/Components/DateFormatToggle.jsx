import { useState } from 'react';

export default function DateFormatToggle({ 
    value = 'ad', 
    onChange,
    className = ''
}) {
    const handleToggle = (format) => {
        if (onChange) {
            onChange(format);
        }
    };

    return (
        <div className={`inline-flex rounded-md shadow-sm ${className}`} role="group">
            <button
                type="button"
                onClick={() => handleToggle('ad')}
                className={`px-4 py-2 text-sm font-medium border rounded-l-lg focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ${
                    value === 'ad'
                        ? 'bg-blue-700 text-white border-blue-700 dark:bg-blue-600 dark:border-blue-600'
                        : 'bg-white text-gray-900 border-gray-200 hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600'
                }`}
            >
                AD (English)
            </button>
            <button
                type="button"
                onClick={() => handleToggle('bs')}
                className={`px-4 py-2 text-sm font-medium border rounded-r-lg focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ${
                    value === 'bs'
                        ? 'bg-blue-700 text-white border-blue-700 dark:bg-blue-600 dark:border-blue-600'
                        : 'bg-white text-gray-900 border-gray-200 hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600'
                }`}
            >
                BS (नेपाली)
            </button>
        </div>
    );
}