package br.edu.unifcv.faculdade.service;

import java.util.List;
import java.util.Optional;

public interface CrudService<T, ID> {

 	List<T> getAll();

 	Optional<T> findById(ID id);

 	T saveOrUpdate(T object);
 	
 	void delete(T object);

 	void deleteById(ID id);
}