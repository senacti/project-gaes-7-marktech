package com.example.marktech.interfaceService;

import java.util.List;
import java.util.Optional;
import com.example.marktech.modelo.producto;

public interface IinventarioService {
	public List<producto>listar();
	public Optional<producto>listarId(int id);
	public int save(producto p);
	public void delete(int id);
}
