import React from 'react';
import { DatePicker as MantineDatePicker } from '@mantine/dates';

function DatePicker({ wire, mingleData }) {
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
        defaultLevel,
        level,
        onLevelChange,
        maxLevel,
        minLevel,
        hideOutsideDates,
        hideWeekdays,
        weekendDays,
        firstDayOfWeek,
        renderDay,
        getDayProps,
        getYearControlProps,
        getMonthControlProps,
        minDate,
        maxDate,
        excludeDate,
        numberOfColumns,
        size,
        yearsListFormat,
        monthsListFormat,
        decadeLabelFormat,
        yearLabelFormat,
        monthLabelFormat,
        locale,
        ariaLabels,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineDatePicker
            value={value}
            defaultValue={defaultValue}
            onChange={onChange}
            type={type}
            allowDeselect={allowDeselect}
            allowSingleDateInRange={allowSingleDateInRange}
            defaultDate={defaultDate}
            date={date}
            onDateChange={onDateChange}
            defaultLevel={defaultLevel}
            level={level}
            onLevelChange={onLevelChange}
            maxLevel={maxLevel}
            minLevel={minLevel}
            hideOutsideDates={hideOutsideDates}
            hideWeekdays={hideWeekdays}
            weekendDays={weekendDays}
            firstDayOfWeek={firstDayOfWeek}
            renderDay={renderDay}
            getDayProps={getDayProps}
            getYearControlProps={getYearControlProps}
            getMonthControlProps={getMonthControlProps}
            minDate={minDate}
            maxDate={maxDate}
            excludeDate={excludeDate}
            numberOfColumns={numberOfColumns}
            size={size}
            yearsListFormat={yearsListFormat}
            monthsListFormat={monthsListFormat}
            decadeLabelFormat={decadeLabelFormat}
            yearLabelFormat={yearLabelFormat}
            monthLabelFormat={monthLabelFormat}
            locale={locale}
            ariaLabels={ariaLabels}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default DatePicker;
