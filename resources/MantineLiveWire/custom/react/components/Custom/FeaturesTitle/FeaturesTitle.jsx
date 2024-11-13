import React from 'react';
import {
  Title,
  SimpleGrid,
  Text,
  Button,
  ThemeIcon,
  Grid,
  Col,
  rem,
} from '@mantine/core';
import {
  IconReceiptOff,
  IconFlame,
  IconCircleDotted,
  IconFileCode,
} from '@tabler/icons-react';

const icons = {
  'receipt': IconReceiptOff,
  'flame': IconFlame,
  'circle': IconCircleDotted,
  'code': IconFileCode,
};

import { useComponent } from '@/hooks/useComponent';

export default function FeaturesTitle() {
  const { features } = useComponent();

  const items = features.items.map((feature) => {
    const Icon = icons[feature.icon];

    return (
      <div key={feature.title}>
        <ThemeIcon
          size={44}
          radius="md"
          variant="gradient"
          gradient={{ deg: 133, from: 'blue.4', to: 'blue.6' }}
        >
          <Icon style={{ width: rem(26), height: rem(26) }} stroke={1.5} />
        </ThemeIcon>
        <Text mt="sm" mb={7} fw={500}>
          {feature.title}
        </Text>
        <Text size="sm" c="dimmed" lh={1.6}>
          {feature.description}
        </Text>
      </div>
    );
  });

  return (
    <Container size="lg" py="xl">
      <Grid gutter={80}>
        <Col span={{ base: 12, md: 5 }}>
          <Title order={2} className="text-4xl font-bold leading-[1.1]">
            {features.title}
          </Title>
          <Text c="dimmed" mt="md">
            {features.description}
          </Text>

          <Button
            variant="gradient"
            gradient={{ deg: 133, from: 'blue.4', to: 'blue.6' }}
            size="lg"
            radius="md"
            mt="xl"
          >
            {features.action}
          </Button>
        </Col>
        <Col span={{ base: 12, md: 7 }}>
          <SimpleGrid cols={{ base: 1, md: 2 }} spacing={30}>
            {items}
          </SimpleGrid>
        </Col>
      </Grid>
    </Container>
  );
}
