import React from 'react';
import { YearPicker as MantineYearPicker } from '@mantine/dates';

function YearPicker({ wire, mingleData }) {
    const {
        value,
        defaultValue,
        onChange,
        type,
        allowDeselect,
        allowSingleDateInRange,
        defaultDate,
        date,
        onDateChange,
        minDate,
        maxDate,
        getYearControlProps,
        numberOfColumns,
        size,
        yearsListFormat,
        decadeLabelFormat,
        ariaLabels,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineYearPicker
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            type={type}
            allowDeselect={allowDeselect}
            allowSingleDateInRange={allowSingleDateInRange}
            defaultDate={defaultDate}
            date={date}
            onDateChange={onDateChange}
            minDate={minDate}
            maxDate={maxDate}
            getYearControlProps={getYearControlProps}
            numberOfColumns={numberOfColumns}
            size={size}
            yearsListFormat={yearsListFormat}
            decadeLabelFormat={decadeLabelFormat}
            ariaLabels={ariaLabels}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default YearPicker;
