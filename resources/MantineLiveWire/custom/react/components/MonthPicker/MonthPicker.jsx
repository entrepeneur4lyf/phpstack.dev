import React from 'react';
import { MonthPicker as MantineMonthPicker } from '@mantine/dates';

function MonthPicker({ wire, mingleData }) {
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
        maxLevel,
        minDate,
        maxDate,
        getYearControlProps,
        getMonthControlProps,
        numberOfColumns,
        size,
        yearsListFormat,
        monthsListFormat,
        decadeLabelFormat,
        yearLabelFormat,
        locale,
        ariaLabels,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineMonthPicker
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            type={type}
            allowDeselect={allowDeselect}
            allowSingleDateInRange={allowSingleDateInRange}
            defaultDate={defaultDate}
            date={date}
            onDateChange={onDateChange}
            maxLevel={maxLevel}
            minDate={minDate}
            maxDate={maxDate}
            getYearControlProps={getYearControlProps}
            getMonthControlProps={getMonthControlProps}
            numberOfColumns={numberOfColumns}
            size={size}
            yearsListFormat={yearsListFormat}
            monthsListFormat={monthsListFormat}
            decadeLabelFormat={decadeLabelFormat}
            yearLabelFormat={yearLabelFormat}
            locale={locale}
            ariaLabels={ariaLabels}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default MonthPicker;
