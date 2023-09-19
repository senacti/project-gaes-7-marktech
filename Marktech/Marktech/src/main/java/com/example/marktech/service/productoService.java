package com.example.marktech.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.marktech.interfaceService.IinventarioService;
import com.example.marktech.interfaces.IProducto;
import com.example.marktech.modelo.producto;
@Service
public class productoService implements IinventarioService {
	
	@Autowired
	private IProducto data;
	@Override
	public List<producto> listar() {
		// TODO Auto-generated method stub
		return (List<producto>)data.findAll();
	}

	@Override
	public Optional<producto> listarId(int id) {
		return data.findById(id);
		
	}

	@Override
	public int save(producto p) {
		int res=0;
		producto producto=data.save(p);
		if(!producto.equals(null)) {
			res=1;
		}
		return 0;
	}

	@Override
	public void delete(int id) {
		data.deleteById(id);
		
	}

}
