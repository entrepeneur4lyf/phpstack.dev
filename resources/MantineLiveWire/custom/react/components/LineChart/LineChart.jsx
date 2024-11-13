import React from 'react';
import { LineChart as MantineLineChart } from '@mantine/charts';

function LineChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        type,
        h,
        w,
        curveType,
        connectNulls,
        withDots,
        withLegend,
        legendProps,
        withTooltip,
        tooltipProps,
        tooltipAnimationDuration,
        withXAxis,
        withYAxis,
        xAxisProps,
        yAxisProps,
        rightYAxisProps,
        withRightYAxis,
        gridAxis,
        tickLine,
        strokeDasharray,
        unit,
        valueFormatter,
        dotProps,
        activeDotProps,
        strokeWidth,
        orientation,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        rightYAxisLabel,
        withPointLabels,
        lineChartProps,
        gradientStops,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineLineChart
            data={data}
            dataKey={dataKey}
            series={series}
            type={type}
            h={h}
            w={w}
            curveType={curveType}
            connectNulls={connectNulls}
            withDots={withDots}
            withLegend={withLegend}
            legendProps={legendProps}
            withTooltip={withTooltip}
            tooltipProps={tooltipProps}
            tooltipAnimationDuration={tooltipAnimationDuration}
            withXAxis={withXAxis}
            withYAxis={withYAxis}
            xAxisProps={xAxisProps}
            yAxisProps={yAxisProps}
            rightYAxisProps={rightYAxisProps}
            withRightYAxis={withRightYAxis}
            gridAxis={gridAxis}
            tickLine={tickLine}
            strokeDasharray={strokeDasharray}
            unit={unit}
            valueFormatter={valueFormatter}
            dotProps={dotProps}
            activeDotProps={activeDotProps}
            strokeWidth={strokeWidth}
            orientation={orientation}
            gridColor={gridColor}
            textColor={textColor}
            referenceLines={referenceLines}
            xAxisLabel={xAxisLabel}
            yAxisLabel={yAxisLabel}
            rightYAxisLabel={rightYAxisLabel}
            withPointLabels={withPointLabels}
            lineChartProps={lineChartProps}
            gradientStops={gradientStops}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default LineChart;
