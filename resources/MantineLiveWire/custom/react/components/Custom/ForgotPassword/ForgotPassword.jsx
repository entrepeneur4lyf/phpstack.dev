import React from 'react';
import {
  Paper,
  Title,
  Text,
  TextInput,
  Button,
  Container,
  Group,
  Anchor,
} from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function ForgotPassword() {
  const { auth } = useComponent();

  return (
    <Container size={420} my={40}>
      <Title ta="center" className="text-3xl font-bold">
        {auth.title}
      </Title>
      <Text c="dimmed" size="sm" ta="center" mt={5}>
        {auth.description}
      </Text>

      <Paper withBorder shadow="md" p={30} radius="md" mt="xl">
        <TextInput 
          label="Your email" 
          placeholder="me@email.com" 
          required 
        />
        <Group justify="space-between" mt="lg">
          <Anchor c="dimmed" size="sm" component="button">
            {auth.backLink}
          </Anchor>
          <Button className="bg-blue-600 hover:bg-blue-700">
            {auth.action}
          </Button>
        </Group>
      </Paper>
    </Container>
  );
}
