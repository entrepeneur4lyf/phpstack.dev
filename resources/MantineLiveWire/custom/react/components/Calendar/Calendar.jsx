import React from 'react';
import { Calendar as MantineCalendar } from '@mantine/dates';

function Calendar({ wire, mingleData }) {
    const {
        static: isStatic,
        size,
        renderDay,
        getDayProps,
        withCellSpacing,
        minDate,
        maxDate,
        defaultDate,
        month,
        onMonthChange,
        defaultLevel,
        level,
        onLevelChange,
        maxLevel,
        minLevel,
        value,
        onChange,
        multiple,
        weekendDays,
        weekdayFormat,
        hideOutsideDates,
        hideWeekdays,
        firstDayOfWeek,
        preventFocus,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCalendar
            static={isStatic}
            size={size}
            renderDay={renderDay}
            getDayProps={getDayProps}
            withCellSpacing={withCellSpacing}
            minDate={minDate}
            maxDate={maxDate}
            defaultDate={defaultDate}
            month={month}
            onMonthChange={onMonthChange}
            defaultLevel={defaultLevel}
            level={level}
            onLevelChange={onLevelChange}
            maxLevel={maxLevel}
            minLevel={minLevel}
            value={value}
            onChange={onChange}
            multiple={multiple}
            weekendDays={weekendDays}
            weekdayFormat={weekdayFormat}
            hideOutsideDates={hideOutsideDates}
            hideWeekdays={hideWeekdays}
            firstDayOfWeek={firstDayOfWeek}
            preventFocus={preventFocus}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default Calendar;
