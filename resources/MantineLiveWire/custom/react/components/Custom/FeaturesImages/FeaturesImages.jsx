import React from 'react';
import {
  Title,
  Text,
  SimpleGrid,
  Container,
  Image,
} from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function FeaturesImages() {
  const { features } = useComponent();

  const items = features.items.map((feature) => (
    <div key={feature.title} className="flex flex-col items-center text-center">
      <Image
        src={feature.image}
        alt={feature.title}
        style={{ width: 80 }}
        className="mb-4"
      />
      <Text fw={500} mt={4}>
        {feature.title}
      </Text>
      <Text size="sm" c="dimmed" mt={3}>
        {feature.description}
      </Text>
    </div>
  ));

  return (
    <Container size="lg" py="xl">
      <Title order={2} className="text-center mb-4 font-bold">
        {features.title}
      </Title>

      <Container size={600} p={0}>
        <Text c="dimmed" className="text-center mb-12">
          {features.description}
        </Text>
      </Container>

      <SimpleGrid cols={{ base: 1, sm: 2, md: 4 }} spacing={30}>
        {items}
      </SimpleGrid>
    </Container>
  );
}
