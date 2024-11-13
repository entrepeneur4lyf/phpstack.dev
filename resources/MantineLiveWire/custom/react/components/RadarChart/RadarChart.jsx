import React from 'react';
import { RadarChart as MantineRadarChart } from '@mantine/charts';

function RadarChart({ wire, mingleData }) {
    const {
        data,
        dataKey,
        series,
        h,
        w,
        withPolarGrid,
        withPolarAngleAxis,
        withPolarRadiusAxis,
        withLegend,
        radarChartProps,
        polarGridProps,
        polarAngleAxisProps,
        polarRadiusAxisProps,
        classNames,
        styles,
    } = mingleData;

    return (
        <MantineRadarChart
            data={data}
            dataKey={dataKey}
            series={series}
            h={h}
            w={w}
            withPolarGrid={withPolarGrid}
            withPolarAngleAxis={withPolarAngleAxis}
            withPolarRadiusAxis={withPolarRadiusAxis}
            withLegend={withLegend}
            radarChartProps={radarChartProps}
            polarGridProps={polarGridProps}
            polarAngleAxisProps={polarAngleAxisProps}
            polarRadiusAxisProps={polarRadiusAxisProps}
            classNames={classNames}
            styles={styles}
        />
    );
}

export default RadarChart;
