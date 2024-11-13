import React from 'react';
import { Container, Title, Text, Button, Image } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function HeroImageRight() {
  const { hero } = useComponent();

  return (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900">
      <Container size="lg" className="h-full">
        <div className="h-full grid lg:grid-cols-2 gap-8 items-center py-16">
          <div>
            <Title className="text-4xl lg:text-5xl font-bold leading-tight">
              {hero.title}
            </Title>

            <Text c="dimmed" mt="md">
              {hero.description}
            </Text>

            <Button
              variant="filled"
              size="lg"
              radius="xl"
              className="mt-8 bg-blue-600 hover:bg-blue-700"
            >
              {hero.primaryAction}
            </Button>
          </div>

          <Image
            src={hero.image}
            alt=""
            className="order-first lg:order-last"
          />
        </div>
      </Container>
    </div>
  );
}
