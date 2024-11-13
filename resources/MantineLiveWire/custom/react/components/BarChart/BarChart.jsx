import React from 'react';
import { BarChart as MantineBarChart } from '@mantine/charts';

function BarChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        type,
        h,
        w,
        withLegend,
        legendProps,
        withTooltip,
        tooltipProps,
        tooltipAnimationDuration,
        withXAxis,
        withYAxis,
        xAxisProps,
        yAxisProps,
        gridAxis,
        tickLine,
        strokeDasharray,
        unit,
        valueFormatter,
        barProps,
        minBarSize,
        orientation,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        withBarValueLabel,
        barChartProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineBarChart
            data={data}
            dataKey={dataKey}
            series={series}
            type={type}
            h={h}
            w={w}
            withLegend={withLegend}
            legendProps={legendProps}
            withTooltip={withTooltip}
            tooltipProps={tooltipProps}
            tooltipAnimationDuration={tooltipAnimationDuration}
            withXAxis={withXAxis}
            withYAxis={withYAxis}
            xAxisProps={xAxisProps}
            yAxisProps={yAxisProps}
            gridAxis={gridAxis}
            tickLine={tickLine}
            strokeDasharray={strokeDasharray}
            unit={unit}
            valueFormatter={valueFormatter}
            barProps={barProps}
            minBarSize={minBarSize}
            orientation={orientation}
            gridColor={gridColor}
            textColor={textColor}
            referenceLines={referenceLines}
            xAxisLabel={xAxisLabel}
            yAxisLabel={yAxisLabel}
            withBarValueLabel={withBarValueLabel}
            barChartProps={barChartProps}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default BarChart;
