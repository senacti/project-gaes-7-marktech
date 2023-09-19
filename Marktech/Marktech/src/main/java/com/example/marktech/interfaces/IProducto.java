package com.example.marktech.interfaces;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.example.marktech.modelo.producto;
@Repository
public interface IProducto extends CrudRepository<producto, Integer> {

}
