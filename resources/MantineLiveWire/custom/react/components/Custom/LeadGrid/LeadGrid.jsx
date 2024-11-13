import React from 'react';
import { Container, Grid, Skeleton } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function LeadGrid() {
  const { items } = useComponent();

  return (
    <Container size="lg" py="xl">
      <Grid gutter="md">
        {/* Leading item that spans full width */}
        <Grid.Col span={12}>
          <Skeleton height={320} radius="md" animate={false} />
        </Grid.Col>

        {/* Grid of smaller items */}
        {[...Array(4)].map((_, index) => (
          <Grid.Col key={index} span={{ base: 12, sm: 6, md: 3 }}>
            <Skeleton height={200} radius="md" animate={false} />
          </Grid.Col>
        ))}
      </Grid>
    </Container>
  );
}
