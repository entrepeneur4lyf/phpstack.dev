import React from 'react';
import { CompositeChart as MantineCompositeChart } from '@mantine/charts';

function CompositeChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
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
        maxBarWidth,
        orientation,
        gridColor,
        textColor,
        referenceLines,
        xAxisLabel,
        yAxisLabel,
        rightYAxisLabel,
        withPointLabels,
        composedChartProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineCompositeChart
            data={data}
            dataKey={dataKey}
            series={series}
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
            maxBarWidth={maxBarWidth}
            orientation={orientation}
            gridColor={gridColor}
            textColor={textColor}
            referenceLines={referenceLines}
            xAxisLabel={xAxisLabel}
            yAxisLabel={yAxisLabel}
            rightYAxisLabel={rightYAxisLabel}
            withPointLabels={withPointLabels}
            composedChartProps={composedChartProps}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default CompositeChart;
