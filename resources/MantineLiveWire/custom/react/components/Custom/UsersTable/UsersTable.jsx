import React from 'react';
import { Table, Avatar, Text, Group } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function UsersTable() {
  const { users } = useComponent();

  const rows = users.map((user) => (
    <Table.Tr key={user.id}>
      <Table.Td>
        <Group gap="sm">
          <Avatar size={30} src={user.avatar} radius={30} />
          <div>
            <Text fz="sm" fw={500}>
              {user.name}
            </Text>
          </div>
        </Group>
      </Table.Td>

      <Table.Td>
        <Text fz="sm">
          {user.role}
        </Text>
      </Table.Td>

      <Table.Td>
        <Text fz="sm" c="dimmed">
          {user.email}
        </Text>
      </Table.Td>

      <Table.Td>
        <Text fz="sm" c="dimmed">
          {user.phone}
        </Text>
      </Table.Td>
    </Table.Tr>
  ));

  return (
    <Table verticalSpacing="sm">
      <Table.Thead>
        <Table.Tr>
          <Table.Th>Employee</Table.Th>
          <Table.Th>Job title</Table.Th>
          <Table.Th>Email</Table.Th>
          <Table.Th>Phone</Table.Th>
        </Table.Tr>
      </Table.Thead>
      <Table.Tbody>{rows}</Table.Tbody>
    </Table>
  );
}
